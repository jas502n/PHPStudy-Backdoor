# -*- coding:utf8 -*-
__author__='pcat@chamd5.org'
__blog__='http://pcat.cc'

import os
import string
import re


def strings(file) :
    chars = string.printable[:94]
    shortestReturnChar = 4
    regExp = '[%s]{%d,}' % (chars, shortestReturnChar)
    pattern = re.compile(regExp)
    with open(file, 'rb') as f:
        return pattern.findall(f.read())


def grep(lines,pattern):
    for line in lines:
        if pattern in line:
            yield line


def pcheck(filename):
    # trojan feature
    trojan='@eval'
    # just check dll file
    if filename.endswith('.dll'):        
        lines=strings(filename)
        try:
            grep(lines,trojan).next()
        except:
            return
        print '=== {0} ==='.format(filename)
        for line in grep(lines,trojan):
            print line
    pass


def foo():
    # . stand for current directory
    for path, dirs, files in os.walk(".", topdown=False):
        for name in files:
            pcheck(os.path.join(path, name))
        for name in dirs:
            pcheck(os.path.join(path, name))
    pass


if __name__ == '__main__':
    foo()