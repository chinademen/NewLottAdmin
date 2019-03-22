<?php
$aClass = [
    1 => 'btn-default',
    2 => 'btn-success',
    3 => 'btn-danger',
];
foreach ($buttons['pageBatchButtons'] as $element){
//    pr($element->route_name);
//    pr(route('admin-users.destroy'));
//    pr($element->toArray());
    $class = 'btn ' . $aClass[$element->button_type];
    $url = route($element->route_name);
    $onsubmit = 'return ' . $element->button_onclick . "('$url', this.form.id.value);";
?>
<form action="<?php echo e($url); ?>">
    <input class="checkboxId" type="hidden" name="id" value="" />
    <input class="<?php echo e($class); ?>"  type="button" value="<?php echo e($element->label); ?>" onclick="<?php echo e($onsubmit); ?>">
</form>
<?php
}
?>
