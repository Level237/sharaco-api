from fastapi import APIRouter,Depends,HTTPException,status
from fastapi.security import OAuth2PasswordRequestForm
from sqlmodel import Session, select
from app.db.engine import get_db
from app.models.user import User
from app.core.security import verify_password, create_access_token
from app.services.authService import AuthService


router = APIRouter(tags=["auth"])

@router.post("/login")

async def login(form_data: OAuth2PasswordRequestForm = Depends(),
    db: Session = Depends(get_db)):

    return await AuthService.authenticate(
        db=db, 
        email=form_data.username, 
        password=form_data.password
    )

