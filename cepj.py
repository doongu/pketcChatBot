import pymysql

#db오픈

#뭐일진 모르겠지만 일단 받아 와지는 id 값
requested_id = 201712672
#임의로 제 학번으로 설정했습니다.

conn = pymysql.connect(host='pknuce.ml', user='root', password ='rlflsdPrh12', db='students', charset='utf8')#준규봇
curs = conn.cursor()
num = 2019122222222222222524
curs.execute("SELECT EXISTS (select num from students where num=%s) as success;", (num))

result = curs.fetchall()[0][0]

print(result)
conn.close()
