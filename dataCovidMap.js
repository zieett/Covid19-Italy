async function rend() {
    var elementCover = {};
    await fetch("https://covid-api.mmediagroup.fr/v1/cases")
        .then((response) => response.json())
        .then((data) => {
            Object.keys(data).map((key) => {
                var objectParse = {};
                objectParse[data[key].All.abbreviation] = {
                    confirmed: data[key].All.confirmed,
                    deaths: data[key].All.deaths,
                    recovered: data[key].All.recovered,
                };
                Object.assign(elementCover, objectParse);
            });
        });
    return elementCover;
}
