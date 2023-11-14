/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  14/04/2023 14:01:18                      */
/*==============================================================*/


alter table APPARTIENT 
   drop foreign key FK_APPARTIE_APPARTIEN_AXE;

alter table APPARTIENT 
   drop foreign key FK_APPARTIE_APPARTIEN_PERMANEN;

alter table AXE 
   drop foreign key FK_AXE_GERE_PERMANEN;

alter table COMPLETE 
   drop foreign key FK_COMPLETE_COMPLETE_DOCUMENT;

alter table COMPLETE 
   drop foreign key FK_COMPLETE_COMPLETE2_DEMANDE;

alter table DEMANDE 
   drop foreign key FK_DEMANDE_ESTCREEPO_PERMANEN;

alter table DEMANDE 
   drop foreign key FK_DEMANDE_ESTINVITE_NON_PERM;

alter table NECESSITE 
   drop foreign key FK_NECESSIT_NECESSITE_DEMANDE;

alter table NECESSITE 
   drop foreign key FK_NECESSIT_NECESSITE_TACHE;

alter table SERVICE 
   drop foreign key FK_SERVICE_ESTRESPON_PERMANEN;

alter table TACHE 
   drop foreign key FK_TACHE_ESTASSIGN_SERVICE;

alter table TRAVAILLEPOUR 
   drop foreign key FK_TRAVAILL_TRAVAILLE_PERMANEN;

alter table TRAVAILLEPOUR 
   drop foreign key FK_TRAVAILL_TRAVAILLE_SERVICE;


alter table APPARTIENT 
   drop foreign key FK_APPARTIE_APPARTIEN_AXE;

alter table APPARTIENT 
   drop foreign key FK_APPARTIE_APPARTIEN_PERMANEN;

drop table if exists APPARTIENT;


alter table AXE 
   drop foreign key FK_AXE_GERE_PERMANEN;

drop table if exists AXE;


alter table COMPLETE 
   drop foreign key FK_COMPLETE_COMPLETE_DOCUMENT;

alter table COMPLETE 
   drop foreign key FK_COMPLETE_COMPLETE2_DEMANDE;

drop table if exists COMPLETE;


alter table DEMANDE 
   drop foreign key FK_DEMANDE_ESTCREEPO_PERMANEN;

alter table DEMANDE 
   drop foreign key FK_DEMANDE_ESTINVITE_NON_PERM;

drop table if exists DEMANDE;

drop table if exists DOCUMENTS;


alter table NECESSITE 
   drop foreign key FK_NECESSIT_NECESSITE_DEMANDE;

alter table NECESSITE 
   drop foreign key FK_NECESSIT_NECESSITE_TACHE;

drop table if exists NECESSITE;

drop table if exists NON_PERMANENT;

drop table if exists PERMANENT;


alter table SERVICE 
   drop foreign key FK_SERVICE_ESTRESPON_PERMANEN;

drop table if exists SERVICE;


alter table TACHE 
   drop foreign key FK_TACHE_ESTASSIGN_SERVICE;

drop table if exists TACHE;


alter table TRAVAILLEPOUR 
   drop foreign key FK_TRAVAILL_TRAVAILLE_PERMANEN;

alter table TRAVAILLEPOUR 
   drop foreign key FK_TRAVAILL_TRAVAILLE_SERVICE;

drop table if exists TRAVAILLEPOUR;

/*==============================================================*/
/* Table : APPARTIENT                                           */
/*==============================================================*/
create table APPARTIENT
(
   IDAXE                int not null  comment '',
   IDPERM               int not null  comment '',
   primary key (IDAXE, IDPERM)
);

/*==============================================================*/
/* Table : AXE                                                  */
/*==============================================================*/
create table AXE
(
   IDAXE                int not null  comment '',
   IDPERM               int not null  comment '',
   NOMAXE               text  comment '',
   primary key (IDAXE)
);

/*==============================================================*/
/* Table : COMPLETE                                             */
/*==============================================================*/
create table COMPLETE
(
   CODEDOC              int not null  comment '',
   IDDEMANDE            int not null  comment '',
   TELEVERSE            bool  comment '',
   primary key (CODEDOC, IDDEMANDE)
);

/*==============================================================*/
/* Table : DEMANDE                                              */
/*==============================================================*/
create table DEMANDE
(
   IDDEMANDE            int not null  comment '',
   IDPERM               int not null  comment '',
   IDNONPERM            int not null  comment '',
   TYPEDEMARCHE         text  comment '',
   TUTELLE              text  comment '',
   DOMAINE              text  comment '',
   DATE_ARRIVEE         date  comment '',
   DATE_DEPART          date  comment '',
   STATUT               text  comment '',
   primary key (IDDEMANDE)
);

/*==============================================================*/
/* Table : DOCUMENTS                                            */
/*==============================================================*/
create table DOCUMENTS
(
   CODEDOC              int not null  comment '',
   NOMDOC               text  comment '',
   primary key (CODEDOC)
);

/*==============================================================*/
/* Table : NECESSITE                                            */
/*==============================================================*/
create table NECESSITE
(
   IDDEMANDE            int not null  comment '',
   CODETACHE            int not null  comment '',
   TERMINE              bool  comment '',
   primary key (IDDEMANDE, CODETACHE)
);

/*==============================================================*/
/* Table : NON_PERMANENT                                        */
/*==============================================================*/
create table NON_PERMANENT
(
   IDNONPERM            int not null  comment '',
   NOMNP                text  comment '',
   PRENOMNP             text  comment '',
   EMAILNP              text  comment '',
   NATIONALITE          text  comment '',
   primary key (IDNONPERM)
);

/*==============================================================*/
/* Table : PERMANENT                                            */
/*==============================================================*/
create table PERMANENT
(
   IDPERM               int not null  comment '',
   NOMPERM              text  comment '',
   PRENOMPERM           text  comment '',
   LOGINPERM            text not null  comment '',
   MDP                  text  comment '',
   EMAILPERM            text  comment '',
   primary key (IDPERM)
);

/*==============================================================*/
/* Table : SERVICE                                              */
/*==============================================================*/
create table SERVICE
(
   CODESERVICE          int not null  comment '',
   IDPERM               int not null  comment '',
   NOMSERVICE           text  comment '',
   primary key (CODESERVICE)
);

/*==============================================================*/
/* Table : TACHE                                                */
/*==============================================================*/
create table TACHE
(
   CODETACHE            int not null  comment '',
   CODESERVICE          int not null  comment '',
   NOMTACHE             text  comment '',
   primary key (CODETACHE)
);

/*==============================================================*/
/* Table : TRAVAILLEPOUR                                        */
/*==============================================================*/
create table TRAVAILLEPOUR
(
   IDPERM               int not null  comment '',
   CODESERVICE          int not null  comment '',
   primary key (IDPERM, CODESERVICE)
);

alter table APPARTIENT add constraint FK_APPARTIE_APPARTIEN_AXE foreign key (IDAXE)
      references AXE (IDAXE) on delete restrict on update restrict;

alter table APPARTIENT add constraint FK_APPARTIE_APPARTIEN_PERMANEN foreign key (IDPERM)
      references PERMANENT (IDPERM) on delete restrict on update restrict;

alter table AXE add constraint FK_AXE_GERE_PERMANEN foreign key (IDPERM)
      references PERMANENT (IDPERM) on delete restrict on update restrict;

alter table COMPLETE add constraint FK_COMPLETE_COMPLETE_DOCUMENT foreign key (CODEDOC)
      references DOCUMENTS (CODEDOC) on delete restrict on update restrict;

alter table COMPLETE add constraint FK_COMPLETE_COMPLETE2_DEMANDE foreign key (IDDEMANDE)
      references DEMANDE (IDDEMANDE) on delete restrict on update restrict;

alter table DEMANDE add constraint FK_DEMANDE_ESTCREEPO_PERMANEN foreign key (IDPERM)
      references PERMANENT (IDPERM) on delete restrict on update restrict;

alter table DEMANDE add constraint FK_DEMANDE_ESTINVITE_NON_PERM foreign key (IDNONPERM)
      references NON_PERMANENT (IDNONPERM) on delete restrict on update restrict;

alter table NECESSITE add constraint FK_NECESSIT_NECESSITE_DEMANDE foreign key (IDDEMANDE)
      references DEMANDE (IDDEMANDE) on delete restrict on update restrict;

alter table NECESSITE add constraint FK_NECESSIT_NECESSITE_TACHE foreign key (CODETACHE)
      references TACHE (CODETACHE) on delete restrict on update restrict;

alter table SERVICE add constraint FK_SERVICE_ESTRESPON_PERMANEN foreign key (IDPERM)
      references PERMANENT (IDPERM) on delete restrict on update restrict;

alter table TACHE add constraint FK_TACHE_ESTASSIGN_SERVICE foreign key (CODESERVICE)
      references SERVICE (CODESERVICE) on delete restrict on update restrict;

alter table TRAVAILLEPOUR add constraint FK_TRAVAILL_TRAVAILLE_PERMANEN foreign key (IDPERM)
      references PERMANENT (IDPERM) on delete restrict on update restrict;

alter table TRAVAILLEPOUR add constraint FK_TRAVAILL_TRAVAILLE_SERVICE foreign key (CODESERVICE)
      references SERVICE (CODESERVICE) on delete restrict on update restrict;

