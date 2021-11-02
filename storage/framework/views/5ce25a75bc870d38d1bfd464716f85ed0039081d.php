
<script>
<?php while(($notify = session()->pull('notify',false))) {  ?>
	$.notify(<?php echo json_encode($notify[0]['options']); ?>,<?php echo json_encode($notify[0]['settings']); ?>);
<?php } ?>
</script>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/partials/notify.blade.php ENDPATH**/ ?>