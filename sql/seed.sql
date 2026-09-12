INSERT INTO tarif (libelle, prix, description, mention, image, compte_visite, compte_vr, quantite_min) VALUES
('Billet adulte (18 ans et plus)', 15.00, 'Pour une visite d''une heure de l''aquarium', NULL, 'dauphin-adulte.jpg', 1, 0, 1),
('Billet enfant (de 4 à 18 ans)', 10.00, 'Pour une visite d''une heure de l''aquarium', Null, 'dauphin-enfant.jpg', 1, 0, 1),
('Billet réduction (étudiants, demandeurs d''emplois, etc)', 12.00, 'Pour une visite d''une heure de l''aquarium', 'Un justificatif de votre situation vous sera demandé au moment de valider vos billets', 'dauphin-reduction.jpg', 1, 0, 1),
('Billet groupe (à partir de 6 personnes)', 12.00, 'Pour une visite d''une heure de l''aquarium', NULL, 'dauphin-famille.jpg', 1, 0, 6),
('Billet VR seule', 8.00, 'Pour une activité VR de 30 minutes sans la visite d''une heure', NULL, 'vr-billet.jpg', 0, 1, 1),
('Billet VR + visite', 20.00, 'Pour une activité VR de 30 minutes avec la visite d''une heure', NULL, 'vr-visite.jpg', 1, 1, 1)
;

INSERT INTO creneau (date_heure, capacite_visite, capacite_vr) VALUES
('2026-09-12 10:00:00', 60, 8),
('2026-09-12 11:00:00', 60, 10),
('2026-09-12 13:00:00', 45, 5),
('2026-09-12 14:00:00', 15, 2),
('2026-09-12 15:00:00', 5, 0),
('2026-09-12 16:00:00', 60, 10),
('2026-09-12 17:00:00', 60, 10),
('2026-09-13 10:00:00', 27, 4),
('2026-09-13 11:00:00', 31, 8),
('2026-09-13 13:00:00', 22, 10),
('2026-09-13 14:00:00', 10, 0),
('2026-09-13 15:00:00', 14, 9),
('2026-09-13 16:00:00', 55, 7),
('2026-09-13 17:00:00', 60, 10)
;