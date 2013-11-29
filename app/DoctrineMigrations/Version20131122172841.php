<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20131122172841 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
    	$this->addSQL("
    		ALTER TABLE `user` ADD `HasRealNameAuthenticated` ENUM(  'yes',  'no' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT  'no' AFTER  `newNotificationNum`;
    	");

    	$this->addSQL("
			CREATE TABLE `user_real_name_authentication` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `userId` int(11) NOT NULL COMMENT '用户ID',
			  `IDCardNumber` int(18) NOT NULL COMMENT '身份证号',
			  `IDCardName` varchar(255) NOT NULL COMMENT '身份证上的名字',
			  `IDCardFaceImg` varchar(255) NOT NULL COMMENT '身份证正面照片',
			  `IDCardBackImg` varchar(255) NOT NULL COMMENT '身份证反面照片',
			  `userNote` text COMMENT '用户提交申请时写的备注',
			  `status` enum('unauthenticate','authenticating','authenticated','authenticate_fail') NOT NULL,
			  `verifierNote` text COMMENT '审核人审核时写的备注',
			  `verifierId` int(11) unsigned DEFAULT NULL COMMENT '审核人ID',
			  `verifierTime` int(11) NOT NULL COMMENT '审核人审核时间',
			  `createdTime` int(10) NOT NULL COMMENT '用户申请时间',
			  `updateTime` int(11) NOT NULL COMMENT '用户更新申请时间',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户实名认证表';
    	");


    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs

    }
}
