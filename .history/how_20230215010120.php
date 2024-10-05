

<form method="post" action="">
  <button type="submit" name="activate" <?php if ($button_text == 'Activated') {echo 'class="active"';} else {echo 'class="inactive" onclick="window.location.href=\'deposit.php\'"';} ?>>
    <?php echo $button_text; ?>
  </button>
</form>
