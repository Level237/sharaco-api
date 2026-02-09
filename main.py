from fastapi import FastAPI

app = FastAPI(title="Sharaco API")

@app.get("/")
def read_root():
    return {"status": "Sharaco API is running"}