#!/usr/bin/env python3
# -*- coding: utf-8 -*-
from flask import Flask, jsonify, request
import ssl
import requests
# import sql_connect
import sys
from werkzeug.utils import secure_filename
import os

app = Flask(__name__)
app.config['JSON_AS_ASCII'] = False #


# json형식으로 받음
@app.route("/test_log", methods = ['POST'])
def walk_data_to_db():
    json_data = request.get_json()
    print("성공적으로 연동하였습니다.")
    print(json_data)
    return "성공적으로 walk_data를 넣었습니다."



if __name__ == '__main__':
    app.run(host = '0.0.0.0', port = 80, debug = True)