<input id="date" type="date" value="2017-06-01">
<script>
    const d = new Date();
    hora = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
    const meses = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    mes = meses[d.getMonth()];
    data = d.getFullYear() + '-' + mes + '-' + d.getDate();
    console.log(hora + ' ' + data);
</script>