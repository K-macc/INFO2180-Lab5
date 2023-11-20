document.addEventListener('DOMContentLoaded', function (create) {
    var lookcountry = document.getElementById('lookupcountry');
    const lookcity = document.getElementById('lookcities');
    var result = document.getElementById('result');
    var country = document.getElementById('country');

    lookcountry.addEventListener("click", function (e) {
        e.preventDefault();
        fetch('world.php?country=' + country.value)
            .then(response => response.text())
            .then(countrylist => {
                //displayData(countrylist);
                result.innerHTML = countrylist;
            })

        /*function displayData(data) {
            result.textContent = "";
            var str = "";
            var lst = document.createElement('ul');
            for (var i = 11; i < data.length; i++) {
                if (data[i] == "<") {
                    i += 11;
                    lst.appendChild(createElement(str));
                    result.appendChild(lst);
                    str = "";
                    continue;
                } else {
                    str += data[i];
                }
            }
        }

        function createElement(data) {
                var item = document.createElement('li');
                item.appendChild(document.createTextNode(data));
                return item;
        }*/
    })
})