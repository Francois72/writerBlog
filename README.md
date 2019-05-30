# writerBlog
adresse du site: https://billetsimple.000webhostapp.com/


***********************************************
COMMENT SE SERVIR DE LA BASE DE DONNEES? (18)
COMMENT MODIFIER DES DONNEES ? (41)
MODIFIER LE CONTENU D'UN BILLET (exemple) (54)
SUPPRIMER DES COMMENTAIRES (exemple) (61)
LES DROITS "ADMIN" (68)
***********************************************


/!\ Les suppressions de commentaires, l'édition, la suppression et le rajout de billets peuvent se faire directement à partir du site. /!\


------------------------------------------------
--- COMMENT SE SERVIR DE LA BASE DE DONNEES? ---
------------------------------------------------

Adresse de la base de donnée: https://databases.000webhost.com/
Nom d'utilisateur: XXXXXX
Mot de passe: XXXXXX

La base de données s'appelle XXXXXXX. En cliquant dessus (colonne de gauche), vous accéderez aux tables qui composent cette base. Ces tables stockent les données utilisées sur le site.

Dans la base de données XXXXXX, nous avons 3 tables:
- users pour les utilisateurs inscrits
- postwriter pour les billets que vous posterez
- comments pour les commentaires laissés par les utilisateurs


En sélectionant une table, vous accéderez aux données de la table.

Par exemple, en cliquant sur la table "users", vous accéderez aux données concernant les utilisateurs. Cette table "users", dans l'onglet "Parcourir" contient l'identifiant (id), les noms des utilisateurs (user), le mot de passe cripté (pass), l'adresse email (email), la date d'inscription (creation_date) et les droits (rights).

Les colonnes du tableaux (Id, user, pass, etc) sont des champs. Les lignes ont des entrées.


------------------------------------------------
-------- COMMENT MODIFIER DES DONNEES ? --------
------------------------------------------------

1) Pour modifier les données d'une table, par exemple pour changer l'email d'un utilisateur, cliquer sur le lien Editer. 

2) Un nouveau onglet s'ouvrira: l'onglet "Insérer".

3) Dans cette onglet "Insérer", vous pourrez modifier directement l'email en effaçant l'ancien email et en mettant le nouveau. Utiliser le même méthode pour changer d'autres données.

/!\ Attention: si vous changez des données, vous ne pourrez plus revenir en arrière pour les récupérer. Si vous voulez rétablir les valeurs que vous avez effacées, vous devrez les rentrer de nouveau.


------------------------------------------------
--- MODIFIER LE CONTENU D'UN BILLET (exemple) --
------------------------------------------------

Si vous souhaitez changer le texte d'un billet en passant par phpMyAdmin, vous devez cliquer sur la table postswriter (colonne de gauche) et cliquer sur Editer de l'entrée que vous souhaitez modifier. Il ne vous restez plus qu'à modifier ce que vous souhaitez modifier, "Title" correspondant au titre, "content" correspondant au contenu.


------------------------------------------------
----- SUPPRIMER DES COMMENTAIRES (exemple)------
------------------------------------------------

Si vous souhaitez supprimer un commentaire en passant par phpMyAdmin, cliquer sur la table "comments" (colonne de gauche). Choisissez l'entrée (la ligne) correspondant au commentaire que vous voulez effacer et cliquer sur "Supprimer".


------------------------------------------------
-------------- LES DROITS "ADMIN" --------------
------------------------------------------------

Les droits "admin" permettent aux utilisateurs d'accéder ou non à la partie "admin" du site, donc de pouvoir modifier les billets, directement, à partir du site.

On trouve les droits dans la table "users", dans le champ "rights" (dernière colonne). Si "rights" égale à 0, l'utilisateur n'a pas les droits. Si "rights" égale à 1, l'utilisateur a les droits. 
Si on souhaite qu'un utilisateur ait accès à la partie "admin" du site, vous devez cliquer sur "Editer" et remplacer dans "rights" le 0 par le 1. Si au contraire, vous souhaitez lui retirer les droits, remplacer alors le 1 par un 0.


/!\ Je rappelle que les suppressions de commentaires, l'éditions, la suppression et le rajout de billets peuvent se faire directement à partir du site. /!\