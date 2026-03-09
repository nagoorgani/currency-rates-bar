<?php

if(isset($_POST['save_rates'])){

$currencies = [];

if(isset($_POST['currency_name'])){

foreach($_POST['currency_name'] as $key => $name){

if($name != ''){

$currencies[] = [

'name' => sanitize_text_field($_POST['currency_name'][$key]),
'code' => sanitize_text_field($_POST['currency_code'][$key]),
'rate' => sanitize_text_field($_POST['currency_rate'][$key]),
'flag' => esc_url_raw($_POST['currency_flag'][$key])

];

}

}

}

update_option('crb_currencies',$currencies);

echo "<div class='updated'><p>Rates Updated Successfully</p></div>";

}

$currencies = get_option('crb_currencies', []);

?>

<div class="wrap">

<h1>Currency Rates</h1>

<form method="post">

<table class="widefat" id="currency-table">

<thead>

<tr>

<th>Country Name</th>
<th>Currency Code</th>
<th>Rate</th>
<th>Flag URL</th>

</tr>

</thead>

<tbody>

<?php if(!empty($currencies)){

foreach($currencies as $currency){ ?>

<tr>

<td><input type="text" name="currency_name[]" value="<?php echo $currency['name']; ?>"></td>

<td><input type="text" name="currency_code[]" value="<?php echo $currency['code']; ?>"></td>

<td><input type="text" name="currency_rate[]" value="<?php echo $currency['rate']; ?>"></td>

<td><input type="text" name="currency_flag[]" value="<?php echo $currency['flag']; ?>"></td>

</tr>

<?php }

} ?>


<tr>

<td><input type="text" name="currency_name[]" placeholder="Country"></td>

<td><input type="text" name="currency_code[]" placeholder="Code"></td>

<td><input type="text" name="currency_rate[]" placeholder="Rate"></td>

<td><input type="text" name="currency_flag[]" placeholder="Flag URL"></td>

</tr>

</tbody>

</table>

<br>

<input type="submit" name="save_rates" class="button button-primary" value="Save Rates">

</form>

</div>