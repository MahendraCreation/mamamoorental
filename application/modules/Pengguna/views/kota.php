<option value="0">Pilih KOTA</option>
<?php foreach ($get_kota as $kota) { ?>
  <option value="<?php echo $kota->kode;?>"><?php echo $kota->nama;?></option>
<?php }?>


<script type="text/javascript">
$("#id_kota").change(function(){
  var id_kota = {id_kota:$("#id_kota").val()};
  $.ajax({
    type: "POST",
    url : "<?php echo site_url('Pengguna/kecamatan'); ?>",
    data: id_kota,
    success: function(msg){
      $('#kec').html(msg);
    }
  });
});
</script>
