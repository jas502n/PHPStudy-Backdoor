#! /bin/bash
# author: pcat@chamd5.org
# http://pcat.cc

# trojan feature
trojan=@eval

function check_dir(){
    for file in `ls $1`
    do
        f2=$1"/"$file
        if [ -d $f2 ]
        then
            check_dir $f2
        # just check dll file
        elif [ "${file##*.}"x = "dll"x ]
        then
            strings $f2 |grep -q $trojan
            if [ $? == 0 ]
            then
                echo "===" $f2 "===="
                strings $f2 |grep $trojan
            fi
        fi
    done
}
# . stand for current directory
check_dir .