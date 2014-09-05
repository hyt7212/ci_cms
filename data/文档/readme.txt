修改了两个错误：
	1. 函数调用时传入引用报错  和5.3 兼容不好
	2. 模型忘了加载数据数
	3. 包 yii 的说明文档也放到了目录。


I wrote RBAC library < http://en.wikipedia.org/wiki/Rbac > based-on yii’s CAuthManager

Installation:

1- Download ci-rbac from https://bitbucket.org/xmonader/ci-rbac
2- It’s included in a module (nothing functional except authitem_model, rbac_auth) named authman if (you are using HMVC) just copy and drop it in your modules folder else merge the (models/libraries) folders with your application (models/libraries) and *modify* loading the model in rbac_auth
from

$this->CI->load->model("authman/authitem_model"); 
to

$this->CI->load->model("authitem_model"); 
3- Import schema.sql to your database
4- That’s all.

Example:
There’s a hello controller provided with ci-rbac

in the index method

$cp=$this->rbac_auth->createOperation("createPage", "create page");
        $rp=$this->rbac_auth->createOperation("readPage", "read page");
        $up=$this->rbac_auth->createOperation("updatePage", "update page");
        $dp=$this->rbac_auth->createOperation("deletePage", "delete page");

        $ci=$this->rbac_auth->createOperation("createIssue", "create issue");
        $ri=$this->rbac_auth->createOperation("readIssue", "read issue");
        $ui=$this->rbac_auth->createOperation("updateIssue", "update issue");
        $di=$this->rbac_auth->createOperation("deleteIssue", "delete issue"); 
Here we created the operations for Page resource <createPage, readPage, updatePage, deletePage> and for another resource called Issue <creadIssue, readIssue, updateIssue, deleteIssue> 
*NOTE: the result of createOperation/createIssue/createRole are the id of the created item. (keep track of it as we will use it later)

Now let’s get to the roles

$guestRole=$this->rbac_auth->createRole("guest", "guest role");
        $this->rbac_auth->addChilds($guestRole, array($rp, $ri)); 
Here we created a role named guest with description “guest role” and add childs ($rp -id of readPage- $ri -id of readIssue) to it

$memberRole=$this->rbac_auth->createRole("member", "member role");
        $this->rbac_auth->addChilds($memberRole, array($guestRole, $cp, $ci, $up, $ui)); 
Here we created a member role; which has all the operations of $guestRole and ($cp, $ci, $up, $ui)

$ownerRole=$this->rbac_auth->createRole("owner", "owner role");
        $this->rbac_auth->addChilds($ownerRole, array($guestRole, $memberRole, $cp, $ci, $up, $ui, $dp, $di)); 
the owner role… you got the idea

$adminRole=$this->rbac_auth->createRole("admin", "admin role");
        $admMan=$this->rbac_auth->createTask("adminManagement", "adminManagement");
        
        
        $this->rbac_auth->addChilds($adminRole, array($ownerRole, $memberRole, $guestRole, $admMan)); 
here’s the admin role with operations of guest, member and owner roles + adminManagement task 
*Task is kinda higher-level representation of operations

$this->rbac_auth->assign("admin", 1); //admin
        $this->rbac_auth->assign("member", 2); //someone. 
Here we assign the users to the roles; 
as you can see user with id=1 is set to admin role, user 2 is set to member

$this->rbac_auth->assign("deleteIssue", 2); 
you can add extra operations for specific user; here user 2 hasAccess to deleteIssue operation.


Checking access:

if ($this->rbac_auth->checkAccessForUser(1, "deletePage")){
            echo "YES, admin can deletePage";
        }else{
            echo "No, Admin can't";
            
        }
        echo "<br />";
        if ($this->rbac_auth->checkAccessForUser(2, "deletePage")){
            echo "YES, user can deletePage";
        }else{
            echo "No, user can't";
            
        }
        echo "<br />";
        
        if ($this->rbac_auth->checkAccessForUser(1, "deleteIssue")){
            echo "YES, admin can deleteIssue";
        }else{
            echo "No, admin can't";
            
        }
        echo "<br />";
        
        if ($this->rbac_auth->checkAccessForUser(2, "deleteIssue")){
            echo "YES, user can deleteIssue";
        }else{
            echo "No, user can't";
            
        }
        echo "<br />";
        
        if ($this->rbac_auth->checkAccessForUser(1, "adminManagement")){
            echo "YES, admin can do adminManagement";
        }else{
            echo "No, Admin can't";
            
        }
        echo "<br />";
        
        if ($this->rbac_auth->checkAccessForUser(2, "adminManagement")){
            echo "YES, user can do adminManagement";
        }else{
            echo "No, user can't";
            
        }
        echo "<br />"; 
Backends:
Only DB-Backend for now 