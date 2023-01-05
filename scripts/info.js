window.onload = function () {
    var kits = {
        "id": [
            {

                "name": "Фальсен",
                "price": [100, 200, 300],
                "privilege": [],
                "items": [],
                "commands": []

            },
            {

                "name": "Гравина",
                "price": [100, 200, 300],
                "privilege": [],
                "items": [],
                "commands": []

            }

        ]
    }
    
    
    function reply_click(clicked_id){
        alert(clicked_id);
        document.getElementById("name").innerHTML = kits.id[clicked_id].name;
    }
}

