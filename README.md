

# 🎓 **Youdemy - Plateforme de Cours en Ligne**  

🚀 **Description**  
Bienvenue sur **Youdemy**, une plateforme innovante conçue pour révolutionner l’apprentissage en ligne ! Avec un système interactif et personnalisé, Youdemy relie étudiants et enseignants pour une expérience éducative engageante et efficace.  

---

## ✨ **Fonctionnalités Principales**  

### 👩‍🏫 **Front Office**  

#### 🌟 **Pour les Visiteurs**  
- 🗂️ Accès au catalogue des cours avec pagination.  
- 🔍 Recherche de cours par mots-clés.  
- 📝 Création d’un compte avec choix du rôle (Étudiant ou Enseignant).  

#### 🎓 **Pour les Étudiants**  
- 📚 Visualisation et recherche dans le catalogue des cours.  
- 🖼️ Consultation des détails des cours (description, contenu, enseignant, etc.).  
- ✅ Inscription aux cours après authentification.  
- 📂 Accès à la section **"Mes Cours"** regroupant les cours suivis.  

#### 📖 **Pour les Enseignants**  
- ➕ Création de nouveaux cours avec les détails suivants :  
  - Titre, description, contenu (vidéo ou document), tags et catégorie.  
- 🛠️ Gestion des cours :  
  - Modification, suppression et consultation des inscriptions.  
- 📊 Accès à une section **"Statistiques"** comprenant :  
  - Nombre d’étudiants inscrits, nombre total de cours, etc.  

---

### 🛡️ **Back Office**  

#### ⚙️ **Pour les Administrateurs**  
- ✅ Validation des comptes enseignants.  
- 👥 Gestion des utilisateurs :  
  - Activation, suspension et suppression des comptes.  
- 🛠️ Gestion des contenus :  
  - Cours, catégories, et tags.  
- 📊 Accès aux statistiques globales :  
  - Nombre total de cours, répartition par catégorie, top cours avec le plus d’étudiants, top 3 des enseignants, etc.  

---

## 📌 **Fonctionnalités Transversales**  
- 🏷️ Un cours peut contenir plusieurs tags (relation **many-to-many**).  
- 💡 Utilisation du polymorphisme dans les méthodes **Ajouter cours** et **Afficher cours**.  
- 🔒 Système d’authentification et d’autorisation pour sécuriser les routes sensibles.  
- 🛡️ Contrôle d’accès : chaque utilisateur peut accéder uniquement aux fonctionnalités liées à son rôle.  

---

## 🛠️ **Technologies Utilisées**  
- 🐘 **PHP 8** (Programmation Orientée Objet).  
- 🗄️ **PDO** pour la gestion sécurisée des bases de données.  
- 🎨 **HTML & Tailwind CSS** pour l’interface utilisateur.  
- 🔐 Sécurisation des données et gestion des rôles utilisateurs.  

---

## 🔗 **Installation et Configuration**  

1. Clonez ce dépôt :  
   ```bash
   https://github.com/adilaitelhoucine1/Youdemy-Project.git
