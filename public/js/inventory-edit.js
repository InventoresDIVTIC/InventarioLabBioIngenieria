function selectData(data, id) {
    var x = document.getElementById(id).options.length;
    console.log(data);
    if (data == null) {
        document.getElementById(id).selectedIndex = 0;
    } else {
        for (var i = 0; i < x; i++) {
            if (data == document.getElementById(id).options[i].text) {
                document.getElementById(id).selectedIndex = i;
                break;
            }
        }
    }
}
