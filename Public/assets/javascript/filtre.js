$(document).ready(function() {
    $('.datatable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "order": [[ 1, "asc" ]], // Tri par défaut sur la colonne 2 (Animal)
        "responsive": true, // Activer le mode responsive
        "autoWidth": false, // Désactiver la largeur automatique
        "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]], // Ajoute les options 10, 25, 50 et 100
        "pageLength": 25, // Nombre d'entrées affichées par défaut
        "columnDefs": [
            { "width": "10%", "targets": 0 }, // Largeur de la première colonne (Rapport rédigé par)
            { "width": "10%", "targets": 1 }, // Largeur de la colonne Animal
            { "width": "10%", "targets": 2 }, // Largeur de la colonne État
            { "width": "10%", "targets": 3 }, // Largeur de la colonne Détail État
            { "width": "7%", "targets": 4 }, // Largeur de la colonne Date et Heure employé
            { "width": "6%", "targets": 5 }, // Largeur de la colonne Date de passage vétérinaire
            { "width": "8%", "targets": 6 }, // Largeur de la colonne Nourriture préconisée
            { "width": "8%", "targets": 7 },  // Largeur de la colonne Nourriture donnée
            { "width": "8%", "targets": 8 },  // Largeur de la colonne Quantité préconisée
            { "width": "8%", "targets": 9 },  // Largeur de la colonne Quantité donnée
            { "width": "15%", "targets": 10 }  // Largeur de la colonne Actions
        ],
        "language": {
            "sProcessing":     "Traitement en cours...",
            "searchPlaceholder": "Rechercher", // Placeholder "Rechercher"
            "sSearch":         "",
            "sLengthMenu":     "_MENU_",
            "sInfo":           "Affichage de l'entrée _START_ à _END_ sur _TOTAL_ entrées",
            "sInfoEmpty":      "Affichage de l'entrée 0 à 0 sur 0 entrées",
            "sInfoFiltered":   "(filtré à partir de _MAX_ entrées au total)",
            "sLoadingRecords": "Chargement en cours...",
            "sZeroRecords":    "Aucun élément trouvé",
            "sEmptyTable":     "Aucun élément disponible dans cette table",
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
