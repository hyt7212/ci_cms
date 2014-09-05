/**
 * Database schema required by CDbAuthManager.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @since 1.0
 *
 */

/*
* MODIFIED by Ahmed Youssef <xmonader@gmail.com>
* 
*
*/

drop table if exists auth_item;
drop table if exists auth_item_child;
drop table if exists auth_assignment;

create table auth_item
(
   id                   int(10) unsigned NOT NULL AUTO_INCREMENT,
   name                 varchar(64) not null,
   type                 integer not null,
   description          text,
   bizrule              text,
   data                 text,
   primary key (id, name)
);

create table auth_item_child
(
   id                   int(10) unsigned NOT NULL AUTO_INCREMENT,     
   parent_id            int(10) unsigned NOT NULL, 
   child_id             int(10) unsigned NOT NULL, 
   primary key (id, parent_id, child_id),
   foreign key (parent_id) references auth_item (id) on delete cascade on update cascade,
   foreign key (child_id) references auth_item (id) on delete cascade on update cascade
);

create table auth_assignment
(
   id                   int(10) unsigned NOT NULL AUTO_INCREMENT, 
   itemid               int(10) unsigned NOT NULL, 
   userid               int(10) unsigned NOT NULL, 
   bizrule              text,
   data                 text,
   primary key (id, itemid, userid),
   foreign key (itemid) references auth_item (id) on delete cascade on update cascade
);
