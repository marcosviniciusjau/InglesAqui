import openai
import os
from dotenv import load_dotenv

load_dotenv()

def open_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as infile:
        return infile.read()

def save_file(filepath, content):
    with open(filepath, 'a', encoding='utf-8') as outfile:
        outfile.write(content)

openai.api_key = os.getenv("OPENAI_API_KEY")


# Faça a chamada à API diretamente usando a biblioteca openai
with open("../App/mydata.jsonl","rb") as file:
    response = openai.File.create(
    file=file,
    purpose='fine-tune'
)

    file_id = response['id']
    print(f"File uploaded successfully with ID: {file_id}")
