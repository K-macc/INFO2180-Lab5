document.addEventListener('DOMContentLoaded', function (create) {
    const lookcountry = document.getElementById('lookupcountry');
    const lookcity = document.getElementById('lookupcities');
    var result = document.getElementById('result');
    var country = document.getElementById('country');

    lookcountry.addEventListener("click", function (e) {
        e.preventDefault();
        fetch('world.php?country=' + country.value)
            .then(response => response.text())
            .then(countrylist => {
                result.innerHTML = countrylist;
            })
    })

    lookcity.addEventListener("click", function (e) {
        e.preventDefault();
        fetch('world.php?country=' + country.value + '&lookup=cities')
            .then(response => response.text())
            .then(countrylist => {
                result.innerHTML = countrylist;
            })
    })
})