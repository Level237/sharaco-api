from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from app.api.v1.auth import router as auth_router  # Import de ton nouveau router

app = FastAPI(title="Sharaco API")


app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost:3000"], # L'URL de ton frontend Next.js
    allow_credentials=True,
    allow_methods=["*"], # Autorise toutes les méthodes (POST, GET, etc.)
    allow_headers=["*"], # Autorise tous les headers
)

# 🔗 INCLUSION DES ROUTERS
app.include_router(auth_router,prefix="/api/v1/auth",tags=["auth"])

@app.get("/")
async def root():
    return {"message": "Welcome to Sharaco API"}