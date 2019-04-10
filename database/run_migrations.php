
<?php

$breakpoint_filepath = __DIR__ . '/.migration-breakpoint';
if (file_exists($breakpoint_filepath)) {
    $breakpoint = file_get_contents($breakpoint_filepath);
} else {
    $breakpoint = '';
}
$migrations_path = __DIR__ . '/migrations';
$migration_files = scandir($migrations_path);
$count_migrations = count($migration_files);
$migrations_done = 0;

if ($count_migrations) {
    foreach ($migration_files as $filename) {
        $path = $migrations_path . '/' . $filename;
        $migration_time = substr($filename, 0, 16);
        if (is_file($path) && strcmp($migration_time, $breakpoint) > 0) {
            echo $filename . PHP_EOL;
            try {
                require $path;
                $migrations_done++;
                $breakpoint = $migration_time;
            } catch (Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }
        }
    }
    
    file_put_contents($breakpoint_filepath, $breakpoint);
}
if ($migrations_done == 0) {
    echo 'All migrations are already done!' . PHP_EOL;
} else {
    echo 'Migrations done: ' . $migrations_done . PHP_EOL;
}

?>