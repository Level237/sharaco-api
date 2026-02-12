from sqlmodel import create_engine, SQLModel, Session
from sqlalchemy.ext.asyncio import create_async_engine, AsyncSession
from sqlalchemy.orm import sessionmaker
from app.core.config import settings
import os
from dotenv import load_dotenv

load_dotenv()

DATABASE_URL = settings.DATABASE_URL
# Si ton URL commence par postgresql://, on crée l'engine synchrone pour les scripts
SYNC_DATABASE_URL = DATABASE_URL.replace("postgresql+asyncpg://", "postgresql://")

# L'engine pour les scripts (celui que ton erreur réclame)
engine = create_engine(SYNC_DATABASE_URL, echo=True)

# L'engine pour FastAPI (Asynchrone)
async_engine = create_async_engine(DATABASE_URL, echo=True)

# Générateur de session pour FastAPI
async def get_db():
    async_session = sessionmaker(
        async_engine, class_=AsyncSession, expire_on_commit=False
    )
    async with async_session() as session:
        yield session