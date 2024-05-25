<?php

$routes = [];


route('/', function() {
    require(__DIR__ . '/students.php');
});

route('/edit', function() {
    require(__DIR__ . '/edit-student.php');
});
route('/edit/user',function() {
    global $db;
    global $routes;
    $studentid = $_POST['studentid'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $p3 = $_POST['p3'];
    $cf = $_POST['cf'];
    $query = $db->updateStudentGrades($studentid,$p1,$p2,$p3,$cf);
    $callback = $routes['/'];
    $callback();
});

route('/404', function() {
    echo '404';
});

function route(string $path, callable $callback) {
    global $routes;
    $routes[$path] = $callback;

}
function run(){
    global $routes;
    $found = false;
    $uri = $_SERVER['REQUEST_URI'];
    foreach($routes as $path => $callback) {
        if ($path !== $uri) continue;
        $found = true;
        $callback();
    }
    if (!$found) {
        $notFoundCallback = $routes['/404'];
        $notFoundCallback();
    }
}

run();

