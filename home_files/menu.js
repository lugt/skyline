SUBMENU_CONFIG = {
    "custom": {
        "id": "custom",
        "name": "常用",
		"iam":"0",
        "icon": "",
        "tip": "",
        "parent": "root",
        "top": "",
        "items": {
			
				"addcustom": {
                "id": "addcustom",
                "name": "添加客户",
                "icon": "",
                "tip": "",
                "parent": "custom",
                "top": "",
                "url": "index.php?goto=addcustom"
            },
				"find_custom": {
                "id": "find_custom",
                "name": "查看客户",
                "icon": "",
                "tip": "",
                "parent": "custom",
                "top": "",
                "url": "index.php?goto=findcustom"
            },
				"record_set": {
                "id": "record_commu",
                "name": "沟通纪要",
                "icon": "",
                "tip": "",
                "parent": "custom",
                "top": "",
                "url": "index.php?goto=comm"
            },
				"record_list": {
                "id": "record_list",
                "name": "纪要查看",
                "icon": "",
                "tip": "",
                "parent": "custom",
                "top": "",
                "url": "index.php?goto=listcomm"
            },
            "custom_set": {
                "id": "admin_founder",
                "name": "点击申请",
                "icon": "",
                "tip": "",
                "parent": "custom",
                "top": "",
                "url": "index.php?goto=leave"
            },
            "config_site": {
                "id": "config_site",
                "name": "查看预约",
                "icon": "",
                "tip": "",
                "parent": "custom",
                "top": "",
                "url": "index.php?goto=auth"
            }
		}
    },
    "leave": {
        "id": "leave",
		"iam":"0",
        "name": "预约",
        "icon": "",
        "tip": "",
        "parent": "root",
        "top": "",
        "items": {
            "admin_founder": {
                "id": "admin_founder",
                "name": "普通预约",
                "icon": "",
                "tip": "",
                "parent": "leave",
                "top": "",
                "url": "index.php?goto=leave"
            }
        }
    },
    "config": {
        "id": "config",
        "name": "审核预约",
		"iam":"1",
        "icon": "",
        "tip": "",
        "parent": "root",
        "top": "",
        "items": {
            "config_sites": {
                "id": "config_sites",
                "name": "审核请假",
                "icon": "",
                "tip": "",
                "parent": "config",
                "top": "",
                "url": "index.php?goto=auth"
            },
            /*
            "config_all": {
                "id": "config_all",
                "name": "批量审核",
                "icon": "",
                "tip": "",
                "parent": "config",
                "top": "",
                "url": "index.php?goto=multiauth"
            }*/
        }
    },
    "u": {
        "id": "u",
        "name": "账户",
        "iam":"0",
		"icon": "",
        "tip": "",
        "parent": "root",
        "top": "",
        "items": {
            "u_groups": {
                "id": "u_groups",
                "name": "我的信息",
                "icon": "",
                "tip": "",
                "parent": "u",
                "top": "",
                "url": "index.php?cast=me"
            },
             "u_cgp": {
                "id": "u_cgp",
                "name": "更改密码",
                "icon": "",
                "tip": "",
                "parent": "u",
                "top": "",
                "url": "auth/cgp.php"
            }
        }
    },
    "contents": {
        "id": "contents",
        "name": "记录",
		"iam":"1",
        "icon": "",
        "tip": "",
        "parent": "root",
        "top": "",
        "items": {
            "bbs_article": {
                "id": "bbs_article",
                "name": "往期预约",
                "icon": "",
                "tip": "",
                "parent": "contents",
                "top": "",
                "url": "index.php?goto=elder"
            }
        }
    },
    "design": {
        "id": "design",
        "name": "管理",
		"iam":"1",
        "icon": "",
        "tip": "",
        "parent": "root",
        "top": "",
        "items": {
            "refresher": {
                "id": "refresher",
                "name": "更新数据",
                "icon": "",
                "tip": "",
                "parent": "design",
                "top": "",
                "url": "index.php?cast=refresh"
            },
            
            "design_page": {
                "id": "design_page",
                "name": "用户注册",
                "icon": "",
                "tip": "",
                "parent": "design",
                "top": "",
                "url": "auth/reg.php"
            }
        }
    }
};