document.addEventListener('DOMContentLoaded', function() {
    
    // Przechwycenie przycisku ADD  
    const addButtonFilm = document.getElementById('Film_add');
    const addButtonSeans = document.getElementById('Play_add');
    const addButtonAudience = document.getElementById('Audience_add');

    const editButtonFilm = document.getElementById('Film_edit');
    const editButtonPlay = document.getElementById('Play_edit');
    const editButtonAudience = document.getElementById('Audience_edit');


    // Przechwycenie modala
    const modalAddFilm = document.getElementById('myModalAddFilm');
    const modalAddPlay = document.getElementById('myModalAddPlay');
    const modalAddAudience = document.getElementById('myModalAddAudience');


    const modalEditFilm = document.getElementById('myModalEditFilm');
    const modalEditPlay = document.getElementById('myModalEditPlay');
    const modalEditAudience = document.getElementById('myModalEditAudience');

    // Przechwycenie przycisku zamykania modala
    const closeButtonAF = document.querySelector('.closeAF');
    const closeButtonAP = document.querySelector('.closeAP');
    const closeButtonAA = document.querySelector('.closeAA');

    const closeButtonEF = document.querySelector('.closeEF');
    const closeButtonEP = document.querySelector('.closeEP');
    const closeButtonEA = document.querySelector('.closeEA');


    // Pokazanie modala po kliknieciu przycisku ADD
    addButtonFilm.addEventListener('click', function() {
        modalAddFilm.style.display = 'block';
        modalAddPlay.style.display = 'none';
        modalAddAudience.style.display = 'none';
        modalEditFilm.style.display = 'none';
        modalEditAudience.style.display = 'none';
        modalEditPlay.style.display = 'none';
    });

    addButtonSeans.addEventListener('click', function() {
        modalAddPlay.style.display = 'block';
        modalAddFilm.style.display = 'none';
        modalAddAudience.style.display = 'none';
        modalEditFilm.style.display = 'none';
        modalEditAudience.style.display = 'none';
        modalEditPlay.style.display = 'none';
        
    });

    addButtonAudience.addEventListener('click', function() {
        modalAddAudience.style.display = 'block';
        modalAddPlay.style.display = 'none';
        modalAddFilm.style.display = 'none';
        modalEditFilm.style.display = 'none';
        modalEditAudience.style.display = 'none';
        modalEditPlay.style.display = 'none';
        
    });

    if (editButtonFilm) {
        editButtonFilm.addEventListener('click', function() {
            modalEditFilm.style.display = 'block';
            modalAddPlay.style.display = 'none';
            modalAddAudience.style.display = 'none';
            modalAddFilm.style.display = 'none';
            modalEditAudience.style.display = 'none';
            modalEditPlay.style.display = 'none';
        });
    }

    if (editButtonPlay) {
        editButtonPlay.addEventListener('click', function() {
            modalEditPlay.style.display = 'block';
            modalAddPlay.style.display = 'none';
            modalAddAudience.style.display = 'none';
            modalAddFilm.style.display = 'none';
            modalEditFilm.style.display = 'none';
            modalEditAudience.style.display = 'none';
            
        });
    }

    if (editButtonAudience) {
        editButtonAudience.addEventListener('click', function() {
            modalEditAudience.style.display = 'block';
            modalAddPlay.style.display = 'none';
            modalAddAudience.style.display = 'none';
            modalAddFilm.style.display = 'none';
            modalEditFilm.style.display = 'none';
            modalEditPlay.style.display = 'none';
        });
    }


    // Ukrycie modala po kliknieciu na przycisk zamykania
    closeButtonAF.addEventListener('click', function() {
        modalAddFilm.style.display = 'none';
    });

    closeButtonAP.addEventListener('click', function() {
        modalAddPlay.style.display = 'none';
    });

    closeButtonAA.addEventListener('click', function() {
        modalAddAudience.style.display = 'none';
    });

    closeButtonEF.addEventListener('click', function() {
        modalEditFilm.style.display = 'none';
    });

    closeButtonEP.addEventListener('click', function() {
        modalEditPlay.style.display = 'none';
    });

    
    closeButtonEA.addEventListener('click', function() {
        modalEditAudience.style.display = 'none';
    });
        

    // Ukrycie modala po kliknieciu poza modalem
    window.addEventListener('click', function(event) {
        if (event.target === modalAddFilm) {
            modalAddFilm.style.display = 'none';
        }
        if (event.target === modalAddPlay) {
            modalAddPlay.style.display = 'none';
        }
        if (event.target === modalAddAudience) {
            modalAddAudience.style.display = 'none';
        }
        if (event.target === modalEditFilm) {
            modalEditFilm.style.display = 'none';
        }
        if (event.target === modalEditPlay) {
            modalEditPlay.style.display = 'none';
        }
        if (event.target === modalEditAudience) {
            modalEditAudience.style.display = 'none';
        }

    });

    


    // Obsluga zdarzenia submit formularza
    const addForm = document.getElementById('addForm');
    addForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Zapobieganie domyslnej akcji przegladarki

        
    

        //TD Pobranie tekstu z pola tekstowego
        //const textInput = document.getElementById('textInput').value;

        //TD zrobic wrzucanie do bazy danych dla kazdego
        //console.log('Tekst do dodania:', textInput);

        // Ukrycie modala po kliknieciu submit
        Submit.style.display = 'none';
    });
});
