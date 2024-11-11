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

