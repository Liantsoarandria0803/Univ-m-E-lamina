fetch("./../app/list.php").then( resp => resp.json()).then(
    data=>{
        let tableau=""
        for(let i=0;i<data["members"].length;i++){
            console.log(data["members"][i]);
            tableau+=` <tr>
                        <td>${data["members"][i].username}</td>
                        <td>${data["members"][i].prenom}</td>
                        <td>${data["members"][i].mention}</td>
                        <td>${data["members"][i].parcours}</td>
                        <td>${data["members"][i].age}</td>
                        <td>
                             <button id="edit"> <a href="./../app/modifier.php?id=${data["members"][i].id}">EDIT</a></button>
                               <form action="./../app/delete.php" method="post">
                                    <input id="cache"type="hidden" name="id" value="${data["members"][i].id}">
                                    <button type="submit" id="delete">Delete</button>
                                </form>
                        </td>
                       </tr>`
        }
        document.getElementById("list").innerHTML=`  <tr>
                <td><strong>Nom</strong></td>
                <td><strong>Prenom</strong></td>
                <td><strong>Mention</strong></td>
                <td><strong>Parcours</strong></td>
                <td><strong>Age</strong></td>
                <td><strong>Actions</strong></td>
            </tr>${tableau}`
    }
)