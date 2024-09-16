fetch("./../API/userList.php")
.then(resp=>resp.json())
.then( data=>{
     let tableau=""
    for (let i=0;i<data["members"].length;i++){
        tableau+=` <tr>
                        <td>${data["members"][i][0]}</td>
                        <td>${data["members"][i][1]}</td>
                        <td>${data["members"][i][3]}</td>
                        <td>
                        <button id="edit"><a href="./modifier.php?id=${data["members"][i][0]}">EDIT</a></button>
                            <form action="delete.php" method="post">
                                <input id="cache"type="hidden" name="id" value="${data["members"][i][0]}">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                        
                    </tr>`
                    }
                    document.getElementById("list").innerHTML=`  <tr>
                    <td><strong>id</strong></td>
                    <td><strong>username</strong></td>
                    <td><strong>mail</strong></td>
                    <td><strong>Action</strong></td>
                </tr>${tableau}`
})