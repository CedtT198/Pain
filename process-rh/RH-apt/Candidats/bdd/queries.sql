-- avant
SELECT 
    candidature.*, 
    SUM(experience_travail.duree) AS total_experience, 
    diplome.valeur AS diplome_valeur, 
    diplome.nom AS diplome_nom
FROM 
    candidature
JOIN 
    candidature_in_annonce ON candidature_in_annonce.id_candidature = candidature.id_candidature
JOIN 
    experience_travail ON experience_travail.id_candidature = candidature.id_candidature
JOIN 
    travail ON travail.id_travail = experience_travail.id_travail
JOIN 
    annonce ON annonce.id_annonce = candidature_in_annonce.id_annonce
JOIN 
    diplome ON diplome.id_diplome = candidature.id_diplome
WHERE 
    annonce.id_annonce = 6
GROUP BY 
    candidature.id_candidature
ORDER BY 
    total_experience DESC, diplome_valeur DESC;


-- apres
SELECT 
    candidature.*, 
    SUM(experience_travail.duree) AS total_experience, 
    diplome.valeur AS diplome_valeur
FROM 
    candidature
JOIN 
    candidature_in_annonce ON candidature.id_candidature = candidature_in_annonce.id_candidature
JOIN 
    annonce ON annonce.id_annonce = candidature_in_annonce.id_annonce
JOIN 
    experience_travail ON experience_travail.id_candidature = candidature.id_candidature
JOIN 
    diplome ON diplome.id_diplome = candidature.id_diplome
WHERE 
    annonce.id_annonce = 1
    AND experience_travail.nom IS NOT NULL
GROUP BY 
    candidature.id_candidature
HAVING 
    total_experience >= annonce.duree_exp_requise
ORDER BY 
    total_experience DESC, 
    diplome_valeur DESC;



-- VRAI maka anze manana qualifications
SELECT 
    *,
    SUM(experience_travail.duree) AS total_experience,
    diplome.nom AS diplome_nom
FROM 
    candidature
JOIN 
    candidature_in_annonce ON candidature.id_candidature = candidature_in_annonce.id_candidature
JOIN 
    annonce ON annonce.id_annonce = candidature_in_annonce.id_annonce
JOIN 
    experience_travail ON experience_travail.id_candidature = candidature.id_candidature
JOIN 
    diplome ON diplome.id_diplome = candidature.id_diplome
WHERE 
    annonce.id_annonce = 2
    AND experience_travail.id_travail = annonce.id_travail  -- Condition pour vérifier le même type de travail
GROUP BY 
    candidature.id_candidature
HAVING 
    SUM(experience_travail.duree) >= annonce.duree_exp_requise
ORDER BY 
    total_experience DESC, 
    valeur DESC;




            SELECT 
                *, candidat_nom,
                SUM(experience_travail.duree) AS total_experience,
                diplome.nom AS diplome_nom
            FROM 
                candidature
            JOIN 
                candidature_in_annonce ON candidature.id_candidature = candidature_in_annonce.id_candidature
            JOIN 
                annonce ON annonce.id_annonce = candidature_in_annonce.id_annonce
            JOIN 
                experience_travail ON experience_travail.id_candidature = candidature.id_candidature
            JOIN 
                diplome ON diplome.id_diplome = candidature.id_diplome
            WHERE 
                annonce.id_annonce = 2
                AND experience_travail.id_travail = annonce.id_travail  -- Condition pour vérifier le même type de travail
            GROUP BY 
                candidature.id_candidature
            HAVING 
                SUM(experience_travail.duree) >= annonce.duree_exp_requise
            ORDER BY 
                total_experience DESC, 
                valeur DESC;


    



-- maka anle annonce rehetra miaraka amin'ny candidature fotsiny
SELECT
    *,
    SUM(experience_travail.duree) AS total_experience
FROM 
    candidature
JOIN 
    candidature_in_annonce ON candidature.id_candidature = candidature_in_annonce.id_candidature
JOIN 
    annonce ON annonce.id_annonce = candidature_in_annonce.id_annonce
JOIN 
    experience_travail ON experience_travail.id_candidature = candidature.id_candidature
JOIN 
    diplome ON diplome.id_diplome = candidature.id_diplome
WHERE 
annonce.id_annonce = 7
GROUP BY 
    candidature.id_candidature
ORDER BY 
    total_experience DESC;


            SELECT 
                *, candidature.nom as candidature_nom,
                SUM(experience_travail.duree) AS total_experience,
                diplome.nom AS diplome_nom
            FROM 
                candidature
            JOIN 
                candidature_in_annonce ON candidature.id_candidature = candidature_in_annonce.id_candidature
            JOIN 
                annonce ON annonce.id_annonce = candidature_in_annonce.id_annonce
            JOIN 
                experience_travail ON experience_travail.id_candidature = candidature.id_candidature
            JOIN 
                diplome ON diplome.id_diplome = candidature.id_diplome
            WHERE 
                annonce.id_annonce = 6
                AND experience_travail.id_travail = annonce.id_travail  -- Condition pour vérifier le même type de travail
            GROUP BY 
                candidature.id_candidature
            HAVING 
                SUM(experience_travail.duree) >= annonce.duree_exp_requise
            ORDER BY 
                total_experience DESC, 
                valeur DESC;




select *
FROM resultat_test
JOIN test ON test.id_test = resultat_test.id_test
JOIN candidature ON test.id_candidature = candidature.id_candidature
ORDER BY resultat_test.note DESC;




            SELECT 
                *
            FROM 
                candidature
            JOIN 
                candidature_in_annonce ON candidature.id_candidature = candidature_in_annonce.id_candidature
            JOIN 
                annonce ON annonce.id_annonce = candidature_in_annonce.id_annonce
            JOIN 
                experience_travail ON experience_travail.id_candidature = candidature.id_candidature
            JOIN 
                diplome ON diplome.id_diplome = candidature.id_diplome
            WHERE 
                annonce.id_annonce = 6




select * from notification n
left join test t on n.id_test=t.id_test
left join resultat_test rt on rt.id_test=t.id_test
left join rendez_vous rd on rd.id_rendez_vous=n.id_rendez_vous
WHERE t.id_candidature=1 or rd.id_candidature=1;






        select contrat.*, personnel.*, poste.nom as poste_nom, personnel.nom as personnel_nom, type_contrat.nom as nom_type_contrat
        from contrat
        join personnel on contrat.id_personnel = personnel.id_personnel
        join poste on poste.id_poste = contrat.id_poste
        join type_contrat on type_contrat.id_type_contrat = contrat.id_type_contrat
        where date_renvoie is NOT NULL
        order by contrat.date_debut DESC,  contrat.id_personnel DESC;



