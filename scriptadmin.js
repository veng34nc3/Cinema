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
        document.getElementById('PlayId').disabled = true;
        document.getElementById('HoureditInput').disabled = true;
        document.getElementById('FilmEditSelect2').disabled = true;
        document.getElementById('AudienceEditSelect').disabled = true;
        document.getElementById('FilmEditName').disabled = true;
        document.getElementById('FilmEditLength').disabled = true;
        document.getElementById('FilmEditCategory').disabled = true;
    });

    closeButtonEP.addEventListener('click', function() {
        modalEditPlay.style.display = 'none';
        document.getElementById('PlayId').disabled = true;
        document.getElementById('HoureditInput').disabled = true;
        document.getElementById('FilmEditSelect2').disabled = true;
        document.getElementById('AudienceEditSelect').disabled = true;
        document.getElementById('FilmEditName').disabled = true;
        document.getElementById('FilmEditLength').disabled = true;
        document.getElementById('FilmEditCategory').disabled = true;
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
            document.getElementById('PlayId').disabled = true;
            document.getElementById('HoureditInput').disabled = true;
            document.getElementById('FilmEditSelect2').disabled = true;
            document.getElementById('AudienceEditSelect').disabled = true;
            document.getElementById('FilmEditName').disabled = true;
            document.getElementById('FilmEditLength').disabled = true;
            document.getElementById('FilmEditCategory').disabled = true;
        }
        if (event.target === modalEditPlay) {
            modalEditPlay.style.display = 'none';
            document.getElementById('PlayId').disabled = true;
            document.getElementById('HoureditInput').disabled = true;
            document.getElementById('FilmEditSelect2').disabled = true;
            document.getElementById('AudienceEditSelect').disabled = true;
            document.getElementById('FilmEditName').disabled = true;
            document.getElementById('FilmEditLength').disabled = true;
            document.getElementById('FilmEditCategory').disabled = true;
        }
        if (event.target === modalEditAudience) {
            modalEditAudience.style.display = 'none';
        }
    });

    // Obsługa przycisku "Prześlij"
    document.getElementById('submitButton').addEventListener('click', function(event) {
        event.preventDefault(); // Zapobieganie domyślnej akcji przeglądarki
        document.getElementById('HoureditInput').disabled = false;
        document.getElementById('FilmEditSelect2').disabled = false;
        document.getElementById('AudienceEditSelect').disabled = false;

        const str = document.getElementById("FilmEditSelect").value;
        const words = str.split(' ');
        const title = str.split("numer: " + words[1] + " godzina: " + words[3] + " numer sali: " + words[6] + " nazwa filmu: ");
        const result = title.slice(1,100);

        document.getElementById('PlayId').value = words[1];
        document.getElementById('HoureditInput').value = words[3];
        document.getElementById('FilmEditSelect2').value = result;
        document.getElementById('AudienceEditSelect').value = words[6];
    });

    function parseText(text) {
        // Regular expression to match the format
        const regex = /Title:\s*(.*?)\s*Length:\s*(\d+)\s*min\s*Cathegory:\s*(.*)/;
        const match = text.match(regex);

        if (match) {
            const title = match[1];
            const length = parseInt(match[2]);
            const category = match[3];

            return { title, length, category };
        } else {
            return null;
        }
    }

    document.getElementById('submitButton2').addEventListener('click', function(event) {
        event.preventDefault(); // Zapobieganie domyślnej akcji przeglądarki
        document.getElementById('FilmEditName').disabled = false;
        document.getElementById('FilmEditLength').disabled = false;
        document.getElementById('FilmEditCategory').disabled = false;

        const str = document.getElementById("FilmEditInput").value;
        const parsed = parseText(str);
        
        if (parsed) {
            const title = parsed.title;
            const length = parsed.length;
            const category = parsed.category;
            document.getElementById('FilmEditName').value = title;
            document.getElementById('FilmEditLength').value = length;
            document.getElementById('FilmEditCategory').value = category;
        }

        
    });
});


