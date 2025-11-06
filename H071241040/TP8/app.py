import requests

API_KEY = "AIzaSyA6lnt5pgMLiP-qEsIwCEeSJOsbZUmXCwo"
MODEL   = "models/gemini-2.5-flash"  # ambil persis dari list
URL     = f"https://generativelanguage.googleapis.com/v1beta/{MODEL}:generateContent?key={API_KEY}"

payload = {
    "contents": [
        {"parts": [{"text": "Jelaskan saya apa itu RAG"}]}
    ]
}

r = requests.post(URL, json=payload)
print("HTTP:", r.status_code)

data = r.json()
try:
    # Ambil teks kandidat pertama
    text = data["candidates"][0]["content"]["parts"][0]["text"]
    print("REPLY:", text)
except Exception:
    print("RAW JSON:", data)
