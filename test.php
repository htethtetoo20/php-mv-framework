<!DOCTYPE html>
<html>
<body>

<?php
class MyClass{
    const hi = 'hello';

    public function hello() {
        echo "Hello World!";
    }
}

class AnotherClass extends MyClass {
    public function hi(){
        echo parent::hi;
    }
}

$obj = new AnotherClass();
$obj->hi();
?>

</body>
</html>