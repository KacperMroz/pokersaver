const search = document.querySelector('input[placeholder="search note"]');
const notesContainer = document.querySelector(".notes");

search.addEventListener("keyup", function (event){
        if(event.key === "Enter"){
            event.preventDefault();

            const data = {search: this.value};

            fetch("/search",{
                method: "POST",
                headers:{
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function (response){
                return response.json();
            }).then(function (notes){
                notesContainer.innerHTML = "";
                loadNotes(notes)
            });
        }
    }
);

function loadNotes(notes){
    notes.forEach(note =>{
        console.log(note);
        createNote(note);
    })
}

function createNote(note){
    const template = document.querySelector("#note-template");
    const clone = template.content.cloneNode(true);

    const title = clone.querySelector("h2");
    title.innerHTML = note.title;
    const description = clone.querySelector("h3");
    description.innerHTML = note.description;

    notesContainer.appendChild(clone);
}