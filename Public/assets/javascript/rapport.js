$(document).ready(function() {
    $('#rapportTable').DataTable({
        "ordering": true,
        "searching": true, // Activer la recherche
        "paging": true, // Activer la pagination
        "order": [[6, 'desc']], // Trier par la colonne Date et Heure par défaut (colonne 5)
        "columnDefs": [
            { "orderable": true, "targets": [2, 6] }, // Activer le tri sur Animal et Date
            { "orderable": false, "targets": '_all' } // Désactiver le tri sur les autres colonnes
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr_fr.json",
            "lengthMenu": "Afficher _MENU_ éléments",
            "zeroRecords": "Aucun rapport trouvé",
            "info": "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            "infoEmpty": "Aucun élément disponible",
            "infoFiltered": "(filtré à partir de _MAX_ éléments au total)",
            "search": "Rechercher:",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent"
            }
        }
    });
});
