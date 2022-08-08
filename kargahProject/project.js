
function nameButton(){
    // this function whenerver call it will show the name form in the artist.html file.

    let elem1 = document.getElementById("nameField");
    if (elem1.style.display !== 'block') {
        elem1.style.display = "block";
    
        // close all other forms when the name form open
        document.getElementById("bioField").style.display = 'none';
        document.getElementById("proPicField").style.display = 'none';
        document.getElementById("artworkField").style.display = 'none';
    
    }
    else {
        elem1.style.display = "none";
    }
}

    function bioButton() {
        // this function whenerver call it will show the name form in the artist.html file.

        let elem2 = document.getElementById("bioField");
        if (elem2.style.display !== 'block') {
            elem2.style.display = "block";
            
            // close all other forms when the bio form open
            document.getElementById("nameField").style.display = 'none';
            document.getElementById("proPicField").style.display = 'none';
            document.getElementById("artworkField").style.display = 'none';
        }
        else {
            elem2.style.display = "none";
        }
    }

    function proPicButton() {
        // this function whenerver call it will show the upload new Pofile Pic form in the artist.html file.

        let elem3 = document.getElementById("proPicField");
        if (elem3.style.display !== 'block') {
            elem3.style.display = "block";

            // close all other forms when the upload profile pic form opened
            document.getElementById("nameField").style.display = 'none';
            document.getElementById("bioField").style.display = 'none';
            document.getElementById("artworkField").style.display = 'none';
        }
        else {
            elem3.style.display = "none";
        }
    }

    function uploadArtButton() {
        // this function whenerver call it will show or hide the upload new artwork form in the artist.html file.

        let elem4 = document.getElementById("artworkField");
        if (elem4.style.display !== 'block') {
            elem4.style.display = "block";

            // close all other forms when the upload artwork pic form opened
            document.getElementById("nameField").style.display = 'none';
            document.getElementById("bioField").style.display = 'none';
            document.getElementById("proPicField").style.display = 'none';
        }
        else {
            elem4.style.display = "none";
        }
    }


function checker() {
    let result = confirm("Are you sure?");
    
    if (result == false) {
        event.preventDefault();
    }
}


function editArtworkTitle() {
    // show and hide the new title form on the clickArtwork.php

    let elem = document.getElementById("titleField");
    
    if (elem.style.display !== 'block') {
        elem.style.display = "block";

        // close all other forms
        document.getElementById("categoryField").style.display = 'none';
    }
    else {
        elem.style.display = "none";
    }
}

function editArtworkCategory() {
    // show and hide the new category form on the clickArtwork.php

    let elem = document.getElementById("categoryField");
    
    if (elem.style.display !== 'block') {
        elem.style.display = "block";

        // close all other forms
        document.getElementById("titleField").style.display = 'none';
    }
    else {
        elem.style.display = "none";
    }
}

function deleteAccountConfirm() {
    let result = confirm("Do you want to delete your account?\nAll your data will be erased!");

    if (result == false) {
        event.preventDefault();
    }
}