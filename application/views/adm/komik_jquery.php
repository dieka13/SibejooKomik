<script>
    var jumlah_halaman = 1;
    
    $(document).ready(function(){
        $("#tambah_halaman").click(function(){
            jumlah_halaman++;
            var data = "<div class=\"large-12 columns halaman_komik\">\n"+
                    "<label>Halaman "+jumlah_halaman+" \n"+
                                "<input type=\"file\" value=\"\" name=\"halaman_komik[]\">\n"+
                            "</label>\n"+
                    "</div>\n";
            $(".halaman_komik").last().after(data);
            $("#jumlah_halaman").val(jumlah_halaman);
        });
        
    });
</script>