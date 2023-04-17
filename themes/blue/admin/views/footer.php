<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="clearfix"></div>
<?= '</div></div></div></td></tr></table></div></div>'; ?>
<div class="clearfix"></div>
<footer>
<a href="#" id="toTop" class="blue" style="position: fixed; bottom: 30px; right: 30px; font-size: 30px; display: none;">
    <i class="fa fa-chevron-circle-up"></i>
</a>

    <p style="text-align:center;">&copy; <?= date('Y') . ' ' . $Settings->site_name; ?> <!--(<a href="<?= base_url('documentation.pdf'); ?>" target="_blank">v<?= $Settings->version; ?></a>
        )--> <?php if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    echo ' - Page rendered in <strong>{elapsed_time}</strong> seconds with memory use of {memory_usage}';
} ?></p>
</footer>
<?= '</div>'; ?>
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal fade in" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true"></div>
<div id="modal-loading" style="display: none;">
    <div class="blackbg"></div>
    <div class="loader"></div>
</div>
<div id="ajaxCall"><i class="fa fa-spinner fa-pulse"></i></div>
<?php unset($Settings->setting_id, $Settings->smtp_user, $Settings->smtp_pass, $Settings->smtp_port, $Settings->update, $Settings->reg_ver, $Settings->allow_reg, $Settings->default_email, $Settings->mmode, $Settings->timezone, $Settings->restrict_calendar, $Settings->restrict_user, $Settings->auto_reg, $Settings->reg_notification, $Settings->protocol, $Settings->mailpath, $Settings->smtp_crypto, $Settings->corn, $Settings->customer_group, $Settings->envato_username, $Settings->purchase_code); ?>
<script type="text/javascript">
var dt_lang = <?=$dt_lang?>, dp_lang = <?=$dp_lang?>, site = <?=json_encode(['url' => base_url(), 'base_url' => admin_url(), 'assets' => $assets, 'settings' => $Settings, 'dateFormats' => $dateFormats])?>;
var lang = {paid: '<?=lang('paid');?>', pending: '<?=lang('pending');?>', completed: '<?=lang('completed');?>', ordered: '<?=lang('ordered');?>', received: '<?=lang('received');?>', partial: '<?=lang('partial');?>', sent: '<?=lang('sent');?>', r_u_sure: '<?=lang('r_u_sure');?>', due: '<?=lang('due');?>', returned: '<?=lang('returned');?>', transferring: '<?=lang('transferring');?>', active: '<?=lang('active');?>', inactive: '<?=lang('inactive');?>', unexpected_value: '<?=lang('unexpected_value');?>', select_above: '<?=lang('select_above');?>', download: '<?=lang('download');?>', required_invalid: '<?=lang('required_invalid');?>'};
</script>
<?php
$s2_lang_file = read_file('./assets/config_dumps/s2_lang.js');
foreach (lang('select2_lang') as $s2_key => $s2_line) {
    $s2_data[$s2_key] = str_replace(['{', '}'], ['"+', '+"'], $s2_line);
}
$s2_file_date = $this->parser->parse_string($s2_lang_file, $s2_data, true);
?>
<script type="text/javascript" src="<?= $assets ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.dataTables.dtFilter.min.js"></script>
<?php if($m != 'entries'){ ?>
<script type="text/javascript" src="<?= $assets ?>js/select2.min.js"></script>
<?php } ?>
<script type="text/javascript" src="<?= $assets ?>js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/custom.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/jquery.calculator.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/core.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?= $assets ?>js/plugins/accounting.js/accounting.js"></script>
<?= ($m == 'purchases' && ($v == 'add' || $v == 'edit' || $v == 'purchase_by_csv')) ? '<script type="text/javascript" src="' . $assets . 'js/purchases.js"></script>' : ''; ?>
<?= ($m == 'transfers' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/transfers.js"></script>' : ''; ?>
<?= ($m == 'sales' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/sales.js"></script>' : ''; ?>
<?= ($m == 'returns' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/returns.js"></script>' : ''; ?>
<?= ($m == 'quotes' && ($v == 'add' || $v == 'edit')) ? '<script type="text/javascript" src="' . $assets . 'js/quotes.js"></script>' : ''; ?>
<?= ($m == 'products' && ($v == 'add_adjustment' || $v == 'edit_adjustment')) ? '<script type="text/javascript" src="' . $assets . 'js/adjustments.js"></script>' : ''; 
if($m == 'deals')
{
    echo '<script>
        $(document).ready(function(){
        $("#suppliers").select2();
        });
    </script>';
}
  if($m == 'entries'){
  
  echo '<link rel="stylesheet" src="' . $assets . 'js/plugins/datepicker/datepicker3.css">'; 
  echo '<script type="text/javascript" src="' . $assets . 'js/plugins/datepicker/bootstrap-datepicker.js"></script>'; 
  //echo '<link rel="stylesheet" src="' . $assets . 'js/plugins/select2/select2.min.css">'; plugins/select2/
  echo '<script type="text/javascript" src="' . $assets . 'js/select2.full.min.js"></script>';
?>
 <script type="text/javascript">
   $(document).ready(function(){
    $(".ledger-dropdown").select2({
        width:'100%',
        ajax: { 
            url: "<?=admin_url("entries/ledgerList/"); ?><?=$entrytypeLabel?>",
            dataType: 'json',
            type: "post",
            delay: 250,
            data: function (params) {
                return {
                    searchTerm: params.term,
                    "<?= $this->security->get_csrf_token_name() ?>":"<?= $this->security->get_csrf_hash() ?>" 

                };
            },
            processResults: function (response) {
                console.log(response);
                return {
                    results: response
                };
            },
            cache: true
        },
        placeholder: '<?= lang('please_select_ledger'); ?>'
    });
    $(".dc-dropdown").each(function(){
        $(this).select2("destroy");
    });
    $("[name=tag_id]").select2("destroy");

   });
 </script>

<?php  
}
if($m == 'areports'){  

  echo '<link rel="stylesheet" src="' . $assets . 'js/plugins/datepicker/datepicker3.css">'; 
  echo '<script type="text/javascript" src="' . $assets . 'js/plugins/datepicker/bootstrap-datepicker.js"></script>'; 
  //echo '<link rel="stylesheet" src="' . $assets . 'js/plugins/select2/select2.min.css">'; plugins/select2/
  echo '<script type="text/javascript" src="' . $assets . 'js/select2.full.min.js"></script>';
?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#ReportLedgerId").select2({width:'100%'});
    });
  </script>


<?php
}
 if($m == 'accounts'){?>
    <script type="text/javascript">

/*

  
  $.fn.dataTable.ext.buttons.excel =
  {
    extend: 'excelHtml5',
    text: '<i class="glyphicon glyphicon-export" style="margin-right: 5px; color: #428BCA;"></i><?= lang('export_xls'); ?>',
    className: 'btn btn-link',
    titleAttr: '<?= lang('export_xls'); ?>',
    title: "Avenzur",
    exportOptions: {
      columns: ':not(:last-child)',

    }
  };

  $.fn.dataTable.ext.buttons.import =
  {
    className: 'btn btn-link',
    id: 'ImportToCSV',
    text: "<i class='glyphicon glyphicon-import' style='margin-right: 5px; color: #428BCA;'></i><?= lang('accounts_index_import_from_csv_btn'); ?>",
    action: function (e, dt, node, config)
    {
      //This will send the page to the location specified
      window.location.href = '<?= base_url(); ?>accounts/uploader';
    }
  };
*/


    </script>

<?php
}
?>

<script type="text/javascript" charset="UTF-8">

  var oTable = '', r_u_sure = "<?=lang('r_u_sure')?>";
    <?php //$s2_file_date?>
    $.extend(true, $.fn.dataTable.defaults, {"oLanguage":<?=$dt_lang?>});
    $.fn.datetimepicker.dates['sma'] = <?=$dp_lang?>;
    $(window).load(function () {
        $('.mm_<?=$m?>').addClass('active');
        $('.mm_<?=$m?>').find("ul").first().slideToggle();
        $('#<?=$m?>_<?=$v?>').addClass('active');
        $('.mm_<?=$m?> a .chevron').removeClass("closed").addClass("opened");
    });
    // $.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static';
</script>
<?= (DEMO) ? '<script src="' . $assets . 'js/ppp_ad.min.js"></script>' : ''; ?>
<script type="text/javascript" src="<?= base_url('assets/custom/custom.js') ?>"></script>
</body>
</html>
