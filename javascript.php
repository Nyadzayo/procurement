<html>
<head>


</head>
<body>
<table id="table">
    <thead>
    <td>id</td>
    </thead>
    <tbody>
    <tr>
        <td id="id">2</td>
    </tr>
    </tbody>
</table>
<button onclick="myclick()">click</button>
</body>
<script>
    function myclick() {
        var name = document.getElementById('#table').rows[0].cells.namedItem("#id").innerText;
        alert(name);

    }
</script>
</html>


