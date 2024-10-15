$(document).ready(function() {
    $('.datatable1').DataTable({
        "paging": true,            // Activer la pagination
        "searching": true,         // Activer la recherche
        "ordering": true,          // Activer le tri
        "order": [[ 0, "asc" ]],   // Tri par défaut sur la première colonne (Nom)
        "responsive": true,        // Mode responsive pour les petits écrans
        "autoWidth": false,        // Désactiver la largeur automatique
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]], // Options de pagination
        "pageLength": 10,          // Nombre d'entrées affichées par défaut
        "language": {
            "sProcessing":     "Traitement en cours...",
            "searchPlaceholder": "Rechercher un animal", // Placeholder de recherche
            "sSearch":         "Rechercher :",           // Texte pour le champ de recherche
            "sLengthMenu":     "Afficher _MENU_ entrées", // Texte du menu de sélection du nombre d'entrées
            "sInfo":           "Affichage de l'entrée _START_ à _END_ sur _TOTAL_ entrées",
            "sInfoEmpty":      "Affichage de l'entrée 0 à 0 sur 0 entrées",
            "sInfoFiltered":   "(filtré à partir de _MAX_ entrées au total)",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords":    "Aucun élément trouvé",
            "sEmptyTable":     "Aucun animal disponible dans cette table",
            "oPaginate": {
                "sFirst":    "Premier",
                "sPrevious": "Précédent",
                "sNext":     "Suivant",
                "sLast":     "Dernier"
            },
            "oAria": {
                "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
            },
            "select": {
                "rows": {
                    "_": "%d lignes sélectionnées",
                    "0": "Aucune ligne sélectionnée",
                    "1": "1 ligne sélectionnée"
                }
            }
        }
    });
});
