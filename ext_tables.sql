#
# Table structure for table 'tx_tender_domain_model_tender'
#
CREATE TABLE tx_tender_domain_model_tender (
	headline varchar(255) DEFAULT '' NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,
	tenderdepartment int(11) unsigned DEFAULT '0',
	mediafiles int(11) unsigned DEFAULT '0',
	description text
);

#
# Table structure for table 'tx_tender_domain_model_tenderdepartment'
#
CREATE TABLE tx_tender_domain_model_tenderdepartment (
	name varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	organisationseinheit varchar(255) DEFAULT '0' NOT NULL
);