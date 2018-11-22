	 $(document).ready(function () {
    $("#countryname_1").change(function () {
        var val = $(this).val();
        if (val == "11") {
            $("#country_no_1").html("<option value='Lb'>Lb</option>");
        } else if (val == "item2") {
            $("#size").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
        } else if (val == "item3") {
            $("#size").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");
        }
    });
});