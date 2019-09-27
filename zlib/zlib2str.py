import zlib

f = open('p2.zlib','rb')
s = f.read()
f.close()

file = zlib.decompress(s)

a = open('p2.php','wb')
a.write(file)
a.close()