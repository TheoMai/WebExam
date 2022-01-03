

async function getAllArtist(){
    return await fetch('../../backend/api/artist/get.php').then(res => res.json().then(data => {
        return data
    }).catch((err) => {
        console.log(err)}))
}

async function getAllAlbum(){
    return await fetch('../../backend/api/album/get.php').then(res => res.json().then(data => {
        return data
    }).catch((err) => {
        console.log(err)}))
}

async function getAllTrack(){
    return await fetch('../../backend/api/track/get.php').then(res => res.json().then(data => {
        return data
    }).catch((err) => {
        console.log(err)}))
}


async function getAlbumFromArtist(id){
    return await fetch('../../backend/api/album/getFromArtist.php?ArtistId=' + id).then(res => res.json().then(data => {
        return data
    }).catch((err) => {
        console.log(err)}))
}

async function getTrackFromAlbum(id){
    return await fetch('../../backend/api/track/getFromAlbum.php?AlbumId=' + id).then(res => res.json().then(data => {
        return data
    }).catch((err) => {
        console.log(err)}))
}

