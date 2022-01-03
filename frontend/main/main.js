
const header = document.getElementById('header')
const table = document.getElementById('tableRow')


showArtists().then();



async function showArtists(){
    let data = await getAllArtist()
    buildArtistTable(data)
    console.log(data)
}

async function showAlbums(){
    let data = await getAllAlbum()
    buildAlbumTable(data)
    console.log(data)
}

async function showTracks(){
    let data = await getAllTrack()
    buildTrackTable(data)
    console.log(data)
}

async function getFromArtist(id){
    console.log(id)
    let data = await getAlbumFromArtist(id)
    buildAlbumTable(data)
    console.log(data)
}

async function getFromAlbum(id){
    console.log(id)
    let data = await getTrackFromAlbum(id)
    buildTrackTable(data)
    console.log(data)
}



function buildArtistTable(data){
    table.innerText = '';
    header.innerText = '';

    let headerArtist = `<th>Artist Name</th>
                        <th>Select</th>`

    header.innerHTML = headerArtist;

    for(let i=0; i< data.length; i++){
        let row= ` <tr>
                        <td class="row">${data[i].Name.substring(0,100)}</td>
                        <td class="row"><button class="selectButton" onclick="getFromArtist(${data[i].ArtistId}).then()">select</button></td>
                   </tr>
        `
        table.innerHTML += row
    }
}

function buildAlbumTable(data){
    table.innerText = '';
    header.innerText = '';

    let headerAlbum = `<th>Album Name</th>
                        <th>Select</th>`

    header.innerHTML = headerAlbum;

    for(let i=0; i< data.length; i++){
        let row= ` <tr>
                        <td class="row">${data[i].Title}</td>
                        <td class="row"><button onclick="getFromAlbum(${data[i].AlbumId}).then()" class="selectButton">Select</button></td>
                   </tr>
        `
        table.innerHTML += row
    }
}

function buildTrackTable(data){
    table.innerText = '';
    header.innerText = '';

    let headerAlbum = `<th>Track Name</th>
                       <th>Price</th>
                       <th>Select</th>`

    header.innerHTML = headerAlbum;

    for(let i=0; i< data.length; i++){
        let row= ` <tr>
                        <td class="row">${data[i].Name}</td>
                        <td class="row">${data[i].UnitPrice}</td>
                        <td class="row"><button class="selectButton">Select</button></td>
                   </tr>
        `
        table.innerHTML += row
    }
}









