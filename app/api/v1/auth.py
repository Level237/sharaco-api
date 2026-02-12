from fastapi import APIRouter,Depends,HTTPException,status
from fastapi.security import OAuth2PasswordRequestForm
from sqlmodel import Session, select
from app.database import get_db
from app.models.user import User
from app.core.security import verify_password, create_access_token

router = APIRouter(tags=["auth"])

#@router.post("/login")

